<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    
        <!-- 名前 -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    
        <!-- メール -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    
        <!-- MBTI -->
        <div class="mt-4">
            <x-input-label for="mbti" :value="__('MBTI')" />
            <x-text-input id="mbti" name="mbti" type="text" value="{{ old('mbti', $user->mbti) }}" />
            <x-input-error :messages="$errors->get('mbti')" class="mt-2" />
        </div>
    
        <!-- 自己紹介 -->
        <div class="mt-4">
            <x-input-label for="introduction" :value="__('Introduction')" />
            <x-textarea id="introduction" name="introduction">{{ old('introduction', $user->introduction) }}</x-textarea>
            <x-input-error :messages="$errors->get('introduction')" class="mt-2" />
        </div>
    
        <!-- 出身地 -->
        <div class="mt-4">
            <x-input-label for="hometown" :value="__('Hometown')" />
            <x-text-input id="hometown" name="hometown" type="text" value="{{ old('hometown', $user->hometown) }}" />
            <x-input-error :messages="$errors->get('hometown')" class="mt-2" />
        </div>
    
        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>

</section>
