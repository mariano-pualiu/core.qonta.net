<?php

namespace Architecture\XmlSchemator\Generators\Commands;

use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;

class ContainerApiGenerator extends GeneratorCommand
{
    protected const FILE_TYPE = 'Container';
    private const UI = 'api';

    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */
    public array $inputs = [];
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'core:generate:container:api';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Container for apiato from scratch (API Part)';
    /**
     * The structure of the file path.
     */
    protected string $pathStructure = '{SectionName}/{ContainerName}/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{file-name}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'composer.stub';

    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        $this->promptFileNameInput(Self::FILE_TYPE, $this->getDefaultFileName());

        $this->printInfoMessage('Generating Composer File');

        $generatorParams = [
            'path-parameters' => [
                'SectionName'   => $this->contextInput->get('section')->present()->asStudlyFormat(),
                'ContainerName' => $this->contextInput->get('container')->present()->asStudlyFormat(),
            ],
            'stub-parameters' => [
                'SectionName'    => $this->contextInput->get('section')->present()->asStudlyFormat(),
                'ContainerName'  => $this->contextInput->get('container')->present()->asStudlyFormat(),

                'sectionname'    => $this->contextInput->get('section')->present()->asLowerFormat(),
                'containername'  => $this->contextInput->get('container')->present()->asLowerFormat(),

                'section_name'   => $this->contextInput->get('section')->present()->asSnakeFormat(),
                'container_name' => $this->contextInput->get('container')->present()->asSnakeFormat(),

                'Section Name'   => $this->contextInput->get('section')->present()->asTitleFormat(),
                'Container Name' => $this->contextInput->get('container')->present()->asTitleFormat(),

                'ClassName'      => $this->contextInput->get('file')->present()->asStudlyFormat(),
            ],
            'file-parameters' => [
                'file-name'       => $this->contextInput->get('file')->present()->asStudlyFormat(),
            ],
        ];

        $this->generateFiles($generatorParams);
    }

    /**
     * Get the default file name for this component to be generated
     */
    public function getDefaultFileName(?string $fileType = Self::FILE_TYPE): string
    {
        return 'composer';
    }

    public function getDefaultFileExtension(): string
    {
        return 'json';
    }
}
