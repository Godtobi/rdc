<?php
$lga_id = session()->get('lga_id');
pr($lga_id);
?>
<form id="filter_ledger" action="{{ url('lgas/search') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="col-sm-3 m-b-10">
        <div class="input-group">
            <?php
            $lga = LocalGovt();
            ?>
            {!!Form::select('lga', $lga, @$lga_id, ['class' => 'form-control'])!!}
        </div>
    </div>
    <div class="btn-group col-md-3">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Submit
        </button>
        <a href="{{url('lgas/clear')}}" id="clearBTN" class="btn btn-danger">Clear</a>
    </div>
</form>
