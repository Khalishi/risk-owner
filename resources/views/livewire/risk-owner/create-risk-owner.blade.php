<div>
    <x-button wire:click="$set('openModal', true)">
        Add Risk Owner
    </x-button>

    <x-dialog-modal wire:model="openModal" maxWidth="4xl">
        <x-slot name="title">
            Add Risk Owner
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="name" value="Name" />
                    <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-label for="title" value="Title" />
                    <x-select id="title" type="text" class="mt-1 block w-full" wire:model="state.title">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                    </x-select>
                    <x-input-error for="title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-label for="email" value="Email" />
                    <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" />
                    <x-input-error for="email" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-label for="role" value="Role" />
                    <x-select id="role" type="text" class="mt-1 block w-full" wire:model="state.role">
                        <option value="Owner">Owner</option>
                        <option value="Risk Owner">Manager</option>
                        <option value="Risk Manager">Controller</option>
                    </x-select>
                    <x-input-error for="role" class="mt-2" />
                </div>
            </div  wire:submit="create">
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Cancel
            </x-secondary-button>

            <x-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
