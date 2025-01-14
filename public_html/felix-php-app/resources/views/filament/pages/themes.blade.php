<x-filament-panels::page>
    <x-filament::section class="w-full">

        <div class="relative w-full">
            @if(count($themes) < 1)
                <div class="mx-auto my-5 max-w-xs">
                    <p class="font-medium text-center text-black opacity-30 dark:text-white">No themes found in your
                        theme folder</p>
                </div>
            @endif

            <div class="grid grid-cols-1 gap-5 xl:grid-cols-3 md:grid-cols-2">
                @foreach($themes as $theme)
                    <div class="overflow-hidden border rounded-md border-neutral-200 dark:border-neutral-700">
                        <img class="relative" style="widht:auto; height: 400px"
                             src="{{ url('themes' ) }}/{{ $theme->folder }}/{{ $theme->folder }}.jpg">
                        <div
                            class="flex items-center justify-between flex-shrink-0 w-full p-4 border-t border-neutral-200 dark:border-neutral-700">
                            <div class="relative flex flex-col">
                                <h4 class="font-semibold">{{ $theme->name }}</h4>
                                <p class="text-xs text-zinc-500">@if(isset($theme->version))
                                        {{ 'version ' . $theme->version }}
                                    @endif</p>
                            </div>
                            <div class="relative flex items-center space-x-1">
                                <button wire:click="deleteTheme('{{ $theme->folder }}')"
                                        wire:confirm="Are you sure you want to delete {{ $theme->name }}?"
                                        class="flex items-center justify-center w-8 h-8 border rounded-md border-zinc-200 dark:border-zinc-700 dark:hover:bg-zinc-800 hover:bg-zinc-200">
                                    <x-heroicon-o-trash class="w-4 h-4"/>
                                </button>
                            </div>
                        </div>
                        <div class="w-full p-4 pt-0">
                            @if($theme->active)
                                <div
                                    class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg  fi-btn-color-gray fi-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&]:bg-gray-400 [input:checked+&]:text-white [input:checked+&]:ring-0 [input:checked+&]:hover:bg-gray-300 dark:[input:checked+&]:bg-gray-600 dark:[input:checked+&]:hover:bg-gray-500 fi-ac-action fi-ac-btn-action">
                                    <x-heroicon-o-check class="w-4 h-4"/>
                                    <span>Active</span>
                                </div>
                            @else
                                <button wire:click="activate('{{ $theme->folder }}')"
                                        style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
                                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                                    <x-heroicon-o-power class="w-4 h-4"/>
                                    <span>Activate Theme</span>
                                </button>
                            @endif
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </x-filament::section>
</x-filament-panels::page>
