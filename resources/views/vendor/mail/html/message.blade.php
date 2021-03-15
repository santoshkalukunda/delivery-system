@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}
Thanks,<br>
<img src="https://closetnepal.com.np/uploads/logo/u5UzNvkeCgx75xPHRpuwZE2BnNtfl13uoMq4OwKl.png" alt="closet nepal logo"
    height="40px" srcset="">
<div><b>Closet Nepal Pvt. Ltd.</b></div>

<div>
    <svg class="location" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
        style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <g>
            <g>
                <path d="M256,0C161.896,0,85.333,76.563,85.333,170.667c0,28.25,7.063,56.26,20.49,81.104L246.667,506.5
			c1.875,3.396,5.448,5.5,9.333,5.5s7.458-2.104,9.333-5.5l140.896-254.813c13.375-24.76,20.438-52.771,20.438-81.021
			C426.667,76.563,350.104,0,256,0z M256,256c-47.052,0-85.333-38.281-85.333-85.333c0-47.052,38.281-85.333,85.333-85.333
			s85.333,38.281,85.333,85.333C341.333,217.719,303.052,256,256,256z" />
            </g>
        </g>
    </svg>
    Godawari Municipality, Attariya, kailali</div>
<div>
    <?xml version="1.0" encoding="iso-8859-1"?>
    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
    <svg class="call" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 513.64 513.64"
        style="enable-background:new 0 0 513.64 513.64;" xml:space="preserve">
        <g>
            <g>
                <path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
			c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
			c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
			l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z" />
            </g>
        </g>
    </svg>
    9812727525, 9845032154
</div>
<div>
    <svg class="web" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512"
        xmlns="http://www.w3.org/2000/svg">
        <g>
            <path
                d="m256 512c140.959 0 256-115.049 256-256 0-140.96-115.049-256-256-256-140.959 0-256 115.049-256 256 0 140.96 115.049 256 256 256zm75.947-43.143c14.505-18.535 25.623-40.643 33.974-62.867h58.966c-24.986 28.11-56.854 49.952-92.94 62.867zm115.476-92.857h-71.804c8.852-32.188 14.045-67.876 15.149-105h90.722c-2.528 38.388-14.68 74.185-34.067 105zm0-240c19.387 30.815 31.539 66.612 34.067 105h-90.722c-1.104-37.124-6.297-72.812-15.149-105zm-22.537-30h-58.966c-8.348-22.205-19.465-44.316-33.974-62.857 36.087 12.915 67.955 34.757 92.94 62.857zm-153.886-73.434c29.436 9.977 50.553 44.985 62.631 73.434h-62.631zm0 103.434h73.427c9.538 31.578 15.149 67.403 16.33 105h-89.757zm0 134.99h89.757c-1.181 37.607-6.792 73.432-16.33 105.01h-73.427zm0 135h62.631c-12.098 28.507-33.219 63.476-62.631 73.444zm-183.886.01h58.966c8.348 22.205 19.465 44.316 33.974 62.857-36.087-12.914-67.955-34.757-92.94-62.857zm153.886 73.434c-29.411-9.968-50.531-44.933-62.631-73.434h62.631zm0-103.434h-73.427c-9.538-31.578-15.149-67.403-16.33-105h89.757zm0-135h-89.757c1.181-37.597 6.792-73.422 16.33-105h73.427zm0-208.434v73.434h-62.631c12.099-28.498 33.218-63.465 62.631-73.434zm-60.947 10.577c-14.505 18.535-25.622 40.642-33.974 62.857h-58.965c24.985-28.1 56.853-49.943 92.939-62.857zm-115.476 92.847h71.804c-8.852 32.198-14.045 67.886-15.149 105.01h-90.722c2.528-38.388 14.68-74.185 34.067-105.01zm-34.067 135.01h90.722c1.104 37.124 6.297 72.812 15.149 105h-71.804c-19.387-30.815-31.539-66.612-34.067-105z" />
        </g>
    </svg>
    <a href="https://closetnepal.com.np">closetnepal.com.np</a>
</div>
<div>
    <a href="mailto:closetnepal.com@gmail.com">
        <?xml version="1.0" encoding="iso-8859-1"?>
        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <g>
                <g>
                    <path d="M467,76H45C20.137,76,0,96.262,0,121v270c0,24.885,20.285,45,45,45h422c24.655,0,45-20.03,45-45V121
			C512,96.306,491.943,76,467,76z M460.698,106c-9.194,9.145-167.415,166.533-172.878,171.967c-8.5,8.5-19.8,13.18-31.82,13.18
			s-23.32-4.681-31.848-13.208C220.478,274.284,64.003,118.634,51.302,106H460.698z M30,384.894V127.125L159.638,256.08L30,384.894z
			 M51.321,406l129.587-128.763l22.059,21.943c14.166,14.166,33,21.967,53.033,21.967c20.033,0,38.867-7.801,53.005-21.939
			l22.087-21.971L460.679,406H51.321z M482,384.894L352.362,256.08L482,127.125V384.894z" />
                </g>
            </g>
            <g>
        </svg>
    </a>
    <a href="https://www.facebook.com/closetnepalonlineshopping/">
        <?xml version="1.0" encoding="iso-8859-1"?>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <path style="fill:#1976D2;" d="M448,0H64C28.704,0,0,28.704,0,64v384c0,35.296,28.704,64,64,64h384c35.296,0,64-28.704,64-64V64
            C512,28.704,483.296,0,448,0z" />
            <path style="fill:#FAFAFA;" d="M432,256h-80v-64c0-17.664,14.336-16,32-16h32V96h-64l0,0c-53.024,0-96,42.976-96,96v64h-64v80h64
            v176h96V336h48L432,256z" />
        </svg>
    </a>
</div>
{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} Closetnepal Pvt. Ltd.. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent