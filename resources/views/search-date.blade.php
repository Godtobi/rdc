<form id="filter_ledger" action="{{ url('date/search') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="col-sm-3 m-b-xs">
        <div class="input-group">
            <input type="text" class="input-sm form-control datepicker" id="start_date"
                   name="start_date" value="{{ @$start_date }}" autocomplete="off" placeholder="From:">
            <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button"><i
                                                    class="fa fa-calendar"></i> </button>
                                        </span>
        </div>
    </div>

    <div class="col-sm-3 m-b-xs">
        <div class="input-group">
            <input type="text" class="input-sm form-control datepicker" name="end_date"
                   id="end_date" autocomplete="off" value="{{ @$end_date }}" placeholder="To:">
            <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="button"><i
                                                    class="fa fa-calendar"></i> </button>
                                        </span>
        </div>
    </div>
    <div class="btn-group col-md-3">
        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Submit
        </button>
        <a id="clearBTN" class="btn btn-default">Clear</a>
    </div>
    <br/><br/>
</form>
