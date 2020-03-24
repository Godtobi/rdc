@role('admin')
<div class='btn-group'>
    <a href="{{ route('payments.show', $item->user_id) }}" class='mb-2 mr-2 btn-icon btn btn-primary'>
        <i class="lnr-crop btn-icon-wrapper"></i>View
    </a>

</div>
@endrole
