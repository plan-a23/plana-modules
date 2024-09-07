<?php

namespace Plana23\Modules\Commands;

use Plana23\Modules\Concerns\GeneratesModularFiles;
use Illuminate\Console\GeneratorCommand;

class ModuleMakeFilamentPluginCommand extends GeneratorCommand
{
    use GeneratesModularFiles;

    protected $name = 'module:make:plana-plugin';

    protected $description = 'Create a new Plan A Plugin class in the module';

    protected $type = 'Plan A Plugin';

    protected function getRelativeNamespace(): string
    {
        return 'Filament';
    }

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/filament-plugin.stub');
    }

    protected function stubReplacements(): array
    {
        return [
            'moduleStudlyName' => $this->getModule()->getStudlyName(),
            'pluginId' => str($this->argument('name'))->replace('Plugin', '')->studly()->lower()->toString(),
        ];
    }
}
