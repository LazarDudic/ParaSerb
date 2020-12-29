<div>
    @include('partials.message')
    <form wire:submit.prevent="update()">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"  wire:model="name" value="{{ $user->name }}">
            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

        </div>
        <div class="form-group">
            <label for="email" >E-mail Address:</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  wire:model="email" value="{{ $user->email }}">
            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <p class="pointer" wire:click="addChangePasswordInput()">{{ $changePassword ? 'Close Password Change' : 'Change Password' }}</p>

        @if($changePassword)
            <div class="form-group">
                <label for="name">New Password:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password">
                @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
            <div class="form-group">
                <label for="name">New Password Confirm:</label>
                <input type="password" class="form-control" wire:model="password_confirmation" >
            </div>
        @endif
        <button type="submit" class="btn btn-primary mt-2">{{ isset($user) ? 'Update' : 'Add user' }}</button>
    </form>
</div>
