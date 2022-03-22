@if (Session::get('success', false) || Session::get('error', false))
    <?php $data = Session::has('success') ? Session::get('success') : Session::get('error'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert {{ Session::has('success')? 'alert-success':'alert-danger' }} alert-dismissible fade show" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @else
        <div class="alert {{ Session::has('success')? 'alert-success':'alert-danger' }} alert-dismissible fade show" role="alert">
            <i class="fa fa-check"></i>
            {{ $data }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
@endif

