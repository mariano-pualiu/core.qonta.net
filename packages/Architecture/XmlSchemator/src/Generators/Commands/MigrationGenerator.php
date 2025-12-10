<?php

namespace Architecture\XmlSchemator\Generators\Commands;

use Architecture\XmlSchemator\Parents\Commands\GeneratorCommand;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MigrationGenerator extends GeneratorCommand
{
    const FILE_TYPE = 'Migration';

    /**
     * User required/optional inputs expected to be passed while calling the command.
     * This is a replacement of the `getArguments` function "which reads whenever it's called".
     *
     * @var  array
     */
    public $inputs = [
        ['tablename', null, InputOption::VALUE_OPTIONAL, 'The name for the database table'],
        ['docversion', null, InputOption::VALUE_OPTIONAL, 'The version of the endpoint (1, 2, ...)'],
        // ['model', null, InputOption::VALUE_OPTIONAL, 'The name of the Model'],
        // ['collection', null, InputOption::VALUE_OPTIONAL, 'The name of the Collection of Models'],
    ];

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'catalogos:generate:migration';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an "empty" migration file for a Container';
    /**
     * The type of class being generated.
     */
    protected string $fileType = 'Migration';
    /**
     * The structure of the file path.
     */
    // protected string $pathStructure = '{section-name}/{container-name}/Data/Migrations/{docversion-number}/*';
    protected string $pathStructure = '{section-name}/{container-name}/Data/Migrations/*';
    /**
     * The structure of the file name.
     */
    protected string $nameStructure = '{date}_{file-name}';
    /**
     * The name of the stub file.
     */
    protected string $stubName = 'migration.stub';


    /**
     * @void
     *
     * @throws GeneratorErrorException|FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        $this->promptContextInput('tablename', 'Enter the name of the database table', $this->getDefaultTableName());

        $this->promptContextInput('docversion', 'Enter the endpoint version (integer)', 1);

        $this->promptFileNameInput(Self::FILE_TYPE, $this->getDefaultFileName());

        // Now we need to check if there already exists a "default migration file" for this container!
        // We therefore search for a file that is named "xxxx_xx_xx_xxxxxx_NAME"
        $exists = false;
        // dump($this->pathStructure, [
        //     'section-name' => Arr::get($this->contextInput, 'section.name'),
        //     'container-name' => Arr::get($this->contextInput, 'container.name'),
        //     // 'docversion-number' => 'V'.Arr::get($this->contextInput, 'docversion.name'),
        // ]);
        // Get the actual path of the output file as well as the correct filename
        $this->parsedFileName = $this->parseFileStructure($this->nameStructure, [
            'date' => Carbon::now()->format('Y_m_d_His'),
            'file-name' => Arr::get($this->contextInput, 'file._name'),
        ]);

        $subFolder = $this->parsePathStructure($this->pathStructure, [
            'section-name' => Arr::get($this->contextInput, 'section.name'),
            'container-name' => Arr::get($this->contextInput, 'container.name'),
            // 'docversion-number' => 'V'.Arr::get($this->contextInput, 'docversion.name'),
        ]);

        $folderPath = $this->getFilePath($subFolder);

        $folder = rtrim($folderPath, $this->parsedFileName . '.' . $this->getDefaultFileExtension());

        $migrationName = Arr::get($this->contextInput, 'file._name') . '.' . $this->getDefaultFileExtension();

        // Get the content of this folder
        $exists = collect(File::allFiles($folder))
            ->contains(function ($file) use ($migrationName) {
                return Str::endsWith($file->getFilename(), $migrationName);
            });

        if ($exists) {
            // There exists a basic migration file for this container
            return null;
        }

        $attributes = $this->getListOfAllAttributes(Arr::get($this->contextInput, 'model.Name'));

        $this->printInfoMessage('Generating a basic Migration file');

        $generatorParams = [
            'path-parameters' => [
                'section-name' => Arr::get($this->contextInput, 'section.Name'),
                'container-name' => Arr::get($this->contextInput, 'container.Name'),
                // 'docversion-number' => 'V'.Arr::get($this->contextInput, 'docversion.name'),
            ],
            'stub-parameters' => [
                'section-name' => Arr::get($this->contextInput, 'section.Name'),
                '_section-name' => Arr::get($this->contextInput, 'section._name'),
                'container-name' => Arr::get($this->contextInput, 'container.Name'),
                '_container-name' => Arr::get($this->contextInput, 'container._name'),
                'class-name' => Arr::get($this->contextInput, 'file.Name'),
                'table-name' => Arr::get($this->contextInput, 'tablename.~name'),
                'attributes' => $attributes,
            ],
            'file-parameters' => [
                'date' => Carbon::now()->format('Y_m_d_His'),
                'file-name' => Arr::get($this->contextInput, 'file._name'),
            ],
        ];

        $this->generateFiles($generatorParams);
    }

    /**
     * Get the default file name for this component to be generated
     */
    public function getDefaultFileName(?string $fileType = Self::FILE_TYPE): string
    {
        return 'create_' . $this->getDefaultTableName() . '_table';
    }

    /**
     * Get the default file name for this component to be generated
     */
    public function getDefaultTableName(): string
    {
        return Arr::get($this->contextInput, 'section.~name') . '_' . Arr::get($this->contextInput, 'container.~name') . '_' . Arr::get($this->contextInput, 'collection.~name');
    }

    /**
     * Removes "special characters" from a string
     */
    protected function removeSpecialChars($str): string
    {
        return $str;
    }

    private function getListOfAllAttributes($model)
    {
        $indent = str_repeat(' ', 16);
        $_model = Str::snake($model);
        $fields = [];

        $model = 'App\\Containers\\' . Arr::get($this->contextInput, 'section.Name') . '\\' . Arr::get($this->contextInput, 'container.Name') . '\\Models\\' . $model;
        $model = new $model();
        $columns = $model->getFillable();
        // $columns = Schema::getColumnListing($model->getTable());

        foreach ($columns as $column) {
            if (in_array($column, $model->getHidden())) {
                // Skip all hidden fields of respective model
                continue;
            }

            if (in_array($column, $model->getDates())) {
                $fields[$column] = '$table->date(\'' . $column . '\')->nullable()->default(null)';
                continue;
            }

            // $fields[$column] = '$' . $_model . '->' . $column;
            $fields[$column] = '$table->string(\'' . $column . '\')->nullable()->default(null)';
        }

        // $fields = array_merge($fields, [
        //     'id' => '$' . $_model . '->getHashedKey()',
        //     'created_at' => '$' . $_model . '->created_at->toDateTimeString()',
        //     'updated_at' => '$' . $_model . '->updated_at->toDateTimeString()',
        // ]);
        // dd($fields);
        $attributes = "";
        foreach ($fields as $key => $value) {
            $attributes .= $indent . "$value;" . PHP_EOL;
        }

        return $attributes;
    }
}
