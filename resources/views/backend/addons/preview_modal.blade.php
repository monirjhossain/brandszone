{{-- POPUP ADDONS --}}
    <!-- Button trigger modal -->

            <div class="news">
                <figure class="article">
                    <a href="javascript:void(0)">
                        <img src="{{ filePath($preview_addon->image) }}" class="img-fluid w-100 rounded" alt="{{ $preview_addon->name }}">
                    </a>
                </figure>

                <a href="{{ route('addon.status', $preview_addon->name) }}" class="btn btn-{{ env('PAYTM_ACTIVE') == 'NO' ? 'success' : 'danger' }} w-100">{{ env('PAYTM_ACTIVE') == 'NO' ? 'Activate' : 'Deactivate' }}</a>


            </div>

    {{-- POPUP ADDONS::END --}}