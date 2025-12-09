<?php

namespace Architecture\XmlSchemator\Commands;

use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Input\InputOption;

class ServiceProviderGenerator extends GeneratorCommand
{
    const FILE_TYPE = 'ServiceProvider';

    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */
    public $inputs = [
        // ['stub', null, InputOption::VALUE_OPTIONAL, 'The stub file to load for this generator.'],
        // ['model', null, InputOption::VALUE_OPTIONAL, 'The name of the Model'],
        // ['collection', null, InputOption::VALUE_OPTIONAL, 'The name of the Collection of Models'],
    ];
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'core:generate:serviceprovider';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a ServiceProvider for a Container';
    /**
     * The type of class being generated.
     */
    protected string $fileType = 'ServiceProvider';
    /**
     * The structure of the file path.
     */
    protected string $pathStructure = '{SectionName}/{ContainerName}/Providers/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{FileName}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'providers/mainserviceprovider.stub';

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        // $this->promptContextOption('stub', 'Select the Stub you want to load', ['Generic', 'MainServiceProvider'], 0);

        // load a new stub-file based on the users choice
        // $this->stubName = 'providers/' . Arr::get($this->contextInput, 'stub._name') . '.stub';

        $this->promptFileNameInput(Self::FILE_TYPE, $this->getDefaultFileName());

        $this->printInfoMessage('Generating MainServiceProvider');

        $generatorParams = [
            'path-parameters' => [
                'SectionName'    => $this->contextInput->get('section')->present()->asStudlyFormat(),
                'ContainerName'  => $this->contextInput->get('container')->present()->asStudlyFormat(),
            ],
            'stub-parameters' => [
                'SectionName'    => $this->contextInput->get('section')->present()->asStudlyFormat(),
                'section_name'   => $this->contextInput->get('section')->present()->asSnakeFormat(),

                'ContainerName'  => $this->contextInput->get('container')->present()->asStudlyFormat(),
                'container_name' => $this->contextInput->get('container')->present()->asSnakeFormat(),
            ],
            'file-parameters' => [
                'FileName'       => $this->contextInput->get('file')->present()->asStudlyFormat(),
            ],
        ];

        $this->generateFiles($generatorParams);
    }

    /**
     * Get the default file name for this component to be generated
     */
    public function getDefaultFileName(?string $fileType = Self::FILE_TYPE): string
    {
        return 'MainServiceProvider';
    }
}
