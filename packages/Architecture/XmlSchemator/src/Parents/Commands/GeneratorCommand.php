<?php

namespace Architecture\XmlSchemator\Parents\Commands;

use Apiato\Core\Exceptions\GeneratorErrorException;
use Apiato\Core\Generator\Interfaces\ComponentsGenerator;
use Apiato\Generator\Traits\FileSystemTrait;
use Apiato\Generator\Traits\FormatterTrait;
use Apiato\Generator\Traits\ParserTrait;
use Apiato\Generator\Traits\PrinterTrait;
use Architecture\XmlSchemator\Parents\Commands\Traits\PrompterTrait;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem as IlluminateFilesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

abstract class GeneratorCommand extends Command
{
    use PrompterTrait, ParserTrait, PrinterTrait, FileSystemTrait, FormatterTrait;

    /**
     * Root directory of all sections
     *
     * @var string
     */
    protected const ROOT = 'app/Containers';

    const FILE_NAME = 'Generator';

    /**
     * Relative path for the stubs (relative to this directory / file)
     *
     * @var string
     */
    private const STUB_PATH = 'vendor/apiato/core/Generator/Stubs/*';

    /**
     * Relative path for the custom stubs (relative to the app/Ship directory!
     */
    private const CUSTOM_STUB_PATH = 'Generators/CustomStubs/*';

    protected string $filePath;

    protected Collection $contextInput;

    /**
     * @var string The name of the file to be created (entered by the user)
     */
    protected string $fileName;

    protected $generatorParams;

    protected $parsedFileName;

    protected $stubContent;

    protected $renderedStubContent;

    protected IlluminateFilesystem $fileSystem;

    private array $defaultInputs = [
        ['section', null, InputOption::VALUE_OPTIONAL, 'The name of the section'],
        ['container', null, InputOption::VALUE_OPTIONAL, 'The name of the container'],
        // ['model', null, InputOption::VALUE_OPTIONAL, 'The name of the Model'],
        // ['collection', null, InputOption::VALUE_OPTIONAL, 'The name of the Collection of Models'],
        ['file', null, InputOption::VALUE_OPTIONAL, 'The name of the file'],
    ];

    public function __construct(IlluminateFilesystem $fileSystem)
    {
        parent::__construct();

        $this->fileSystem = $fileSystem;

        $this->contextInput = new Collection;
    }

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        $this->fileType = static::FILE_TYPE;

        // $this->validateGenerator($this);

        $this->promptContextInput('section', 'Enter the name of the Section');
        $this->promptContextInput('container', 'Enter the name of the Container');
        // $this->promptContextInput('model', 'Enter the name of the Model');
        // $this->promptContextInput('collection', 'Enter the name of the Collection of Models');
        // $this->promptContextInput('docversion', 'The version of the Context (1, 2, ...)', 1);
    }

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    protected function generateFiles($generatorParams)
    {
        $fileName = $this->contextInput->get('file')?->present()->asOriginalFormat();
        $sectionName = $this->contextInput->get('section')?->present()->asStudlyFormat();
        $containerName = $this->contextInput->get('container')?->present()->asStudlyFormat();

        // And we are ready to start
        $this->printStartedMessage($sectionName . ':' . $containerName, $fileName);

        if ($generatorParams === null) {
            // The user skipped this step
            return;
        }

        $generatorParams = $this->sanitizeUserData($generatorParams);

        // Get the actual path of the output file as well as the correct filename
        $this->parsedFileName = $this->parseFileStructure($this->nameStructure, $generatorParams['file-parameters']);

        $this->filePath = $this->getFilePath($this->parsePathStructure($this->pathStructure, $generatorParams['path-parameters']));

        if (!$this->fileSystem->exists($this->filePath) || in_array(static::FILE_TYPE, config('architecture-xmlSchemator.core.regenerate_file_types'))) {
            // Prepare stub content
            $this->stubContent = $this->getStubContent();
            $this->renderedStubContent = $this->parseStubContent($this->stubContent, $generatorParams['stub-parameters']);

            $this->generateFile($this->filePath, $this->renderedStubContent);

            $this->printFinishedMessage($this->fileType);
        }

        // Exit the command successfully
        return 0;
    }

    /**
     * @param $generator
     *
     * @throws GeneratorErrorException
     */
    private function validateGenerator($generator): void
    {
        if (!$generator instanceof ComponentsGenerator) {
            throw new GeneratorErrorException(
                'Your component maker command should implement ComponentsGenerator interface.'
            );
        }
    }

    /**
     * Checks if the param is set (via CLI), otherwise asks the user for a value
     *
     * @param $param
     * @param $question
     * @param null $default
     * @return array|string
     */
    protected function checkParameterOrAsk($param, $question, $default = null)
    {
        // Check if we have already have a param set
        $value = $this->option($param);

        if ($value == null) {
            // There was no value provided via CLI, so ask the user..
            $value = $this->ask($question, $default);
        }

        return $value;
    }

    /**
     * Get the default file name for this component to be generated
     */
    protected function getDefaultFileName(?string $fileType = self::FILE_NAME): string
    {
        return 'Default' . Str::ucfirst($fileType);
    }

    /**
     * Checks, if the data from the generator contains path, stub and file-parameters.
     * Adds empty arrays, if they are missing
     *
     * @param $data
     * @return mixed
     */
    private function sanitizeUserData($data)
    {
        if (!array_key_exists('path-parameters', $data)) {
            $data['path-parameters'] = [];
        }

        if (!array_key_exists('stub-parameters', $data)) {
            $data['stub-parameters'] = [];
        }

        if (!array_key_exists('file-parameters', $data)) {
            $data['file-parameters'] = [];
        }

        return $data;
    }

    protected function getFilePath($path): string
    {
        // Complete the missing parts of the path
        $path = base_path() . '/' .
            str_replace('\\', '/', (defined('Static::ROOT') ? static::ROOT : self::ROOT) . '/' . $path) . '.' . $this->getDefaultFileExtension();

        // Try to create directory
        $this->createDirectory($path);

        // Return full path
        return $path;
    }

    /**
     * Get the default file extension for the file to be created.
     */
    protected function getDefaultFileExtension(): string
    {
        return 'php';
    }

    /**
     * @return  mixed
     * @throws FileNotFoundException
     */
    protected function getStubContent(string $stubName = null)
    {
        // Check if there is a custom file that overrides the default stubs
        $path = dirname(__DIR__, 2) . '/' . self::CUSTOM_STUB_PATH;
        $file = str_replace('*', $stubName ?? $this->stubName, $path);

        // Check if the custom file exists
        if (!$this->fileSystem->exists($file)) {
            // It does not exist - so take the default file!
            $path = base_path(self::STUB_PATH);
            $file = str_replace('*', $stubName ?? $this->stubName, $path);
        }

        // Now load the stub
        return $this->fileSystem->get($file);
    }

    /**
     * Get all the console command arguments, from the components. The default arguments are prepended
     */
    protected function getOptions(): array
    {
        return array_merge($this->defaultInputs, $this->inputs ?? []);
    }

    /**
     * @param      $arg
     * @param bool $trim
     *
     * @return  array|string
     */
    protected function getInput($arg, $trim = true)
    {
        return $trim ? $this->trimString($this->argument($arg)) : $this->argument($arg);
    }

    /**
     * Checks if the param is set (via CLI), otherwise proposes choices to the user
     *
     * @param $param
     * @param $question
     * @param $choices
     * @param null $default
     * @return array|string
     */
    protected function checkParameterOrChoice($param, $question, $choices, $default = null)
    {
        // Check if we have already have a param set
        $value = $this->option($param);
        if ($value == null) {
            // There was no value provided via CLI, so ask the user..
            $value = $this->choice($question, $choices, $default);
        }

        return $value;
    }

    /**
     * @param      $param
     * @param      $question
     * @param bool $default
     *
     * @return mixed
     */
    protected function checkParameterOrConfirm($param, $question, $default = false)
    {
        // Check if we have already have a param set
        $value = $this->option($param);
        if ($value === null) {
            // There was no value provided via CLI, so ask the user..
            $value = $this->confirm($question, $default);
        }

        return $value;
    }
}
