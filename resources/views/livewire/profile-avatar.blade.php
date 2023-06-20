<div>
    <form>
        <label class="flex justify-center" for="avatar">
            {{-- @if ($avatar)
                <img src="{{$avatar->temporaryUrl()}}" alt="{{$user->name}}-profile-avatar" class="rounded-full bg-gray-600 hover:bg-gray-500 mx-3 cursor-pointer"
                    style="max-width: 200px; height: 100%">
            @else --}}
                <img src="{{$user->avatar()}}" alt="{{$user->name}}-profile-avatar" class="rounded-full bg-gray-600 hover:bg-gray-500 mx-3 cursor-pointer">
            {{-- @endif --}}
        </label>
        @if($user->id == auth()->user()->id)
            <input type="file" name="avatar" id="avatar" class="hidden" wire:model="avatar">
        @endif
    </form>
</div>
