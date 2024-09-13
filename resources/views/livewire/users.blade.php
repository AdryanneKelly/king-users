<div class="flex flex-col min-h-screen justify-center items-center bg-violet-200">
    <div class="container mx-auto">
        <div class="bg-white rounded-xl px-5 py-10 mx-2 md:p-20 shadow-lg">
            <h1 class="font-bold text-2xl lg:text-start text-center">Usuários</h1>
            <div class="flex flex-col lg:flex-row justify-between gap-2 items-center py-10">
                <input type="text" wire:model.live='search' class="min-w-[400px] py-3 px-3 border rounded-lg"
                    placeholder="Pesquise um usuário...">
                <select wire:model.live='selectedState' class="rounded-lg py-3 px-3 min-w-[400px] bg-violet-50 border">
                    <option value="">Selecione um estado</option>
                    @foreach ($states as $key)
                        <option value="{{ $key }}">{{ $key }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid max-h-[50vh] overflow-auto">
                <div class="grid xl:grid-cols-3 lg:grid-cols-2 gap-4">
                    @foreach ($data as $user)
                        <div class="bg-violet-100 rounded-xl flex flex-row gap-2 p-2 shadow-md">
                            <img src={{ $user['image'] }} alt="" class="rounded-full max-h-[60%]">
                            <div class="flex flex-col gap-1">
                                <span class="font-bold">{{ $user['firstName'] . ' ' . $user['lastName'] }}</span>
                                <span>{{ $user['address']['city'] . ', ' . $user['address']['stateCode'] }}</span>
                                <span
                                    class="rounded-full px-2 border-2 border-violet-500 text-sm text-violet-600 max-w-[100%] text-ellipsis">{{ $user['email'] }}</span>
                                <span
                                    class="rounded-full px-2 border-2 border-violet-500 text-sm text-violet-600 w-fit">{{ $user['phone'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
