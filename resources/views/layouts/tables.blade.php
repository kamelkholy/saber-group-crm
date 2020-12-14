@if (isset($urls['filter']))

<form method="post" action="{{url($urls['module'])}}/filter?back={{$urls['filter']}}">
  {{csrf_field()}}

  <button type="submit" class="btn btn-primary waves-effect waves-light">Filter</button>
  <a href="{{url($urls['filter'])}}" class="btn btn-danger">Clear</a>
  <div class="container">
    <div class="row" style="align-items: baseline;">
      <h6 class="col-sm-2">Cities Filter :</h6>
      <div class="col-md-10">
        <div class="row">
          @foreach($citiesf as $city)
          <div class="col-sm-2 form-check-inline">
            <label class="form-check-label" for="{{$city->city_id}}">
              <input class="form-check-input" type="checkbox" name="city[]" value="{{$city->city_id}}" id="city_{{$city->city_id}}">{{$city->city_name}}
            </label>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row" style="align-items: baseline;">
      <h6 class="col-sm-2">Clients Filter :</h6>
      <div class="col-md-10">
        <div class="row">
          @foreach($clientsf as $client)
          <div class="col-sm-2 form-check-inline">
            <label class="form-check-label" for="{{$client->client_id}}">
              <input class="form-check-input" type="checkbox" name="client[]" value="{{$client->client_id}}" id="client_{{$client->client_id}}">{{$client->client_name}}
            </label>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row" style="align-items: baseline;">
      <h6 class="col-sm-2">Categories Filter :</h6>
      <div class="col-md-10">
        <div class="row">
          @foreach($ccf as $cc)
          <div class="col-sm-2 form-check-inline">
            <label class="form-check-label" for="{{$cc->client_categories_id}}">
              <input class="form-check-input" type="checkbox" name="cc[]" value="{{$cc->client_categories_id}}" id="cc_{{$cc->client_categories_id}}">{{$cc->client_categories_name}}
            </label>
          </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</form>
<hr>
@endif
@if (count($data) > 0)
<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100% !important;">

  <thead>
    <tr>
      @foreach($data as $fk => $first)
      @foreach($first as $key => $value)

      <th>{{$key}}</th>

      @endforeach
      @break
      @endforeach
      @if(!empty($urls) && !(count($urls) == 1 && array_key_exists('add', $urls)))
      <th class="noPrint">#Actions</th>
      @endif
      @isset($comments)
      @for ($i = 0; $i < count(max($comments)); $i++) <th data-visible="false"> Action #{{$i+1}} Comment</th>
        @endfor
        @endisset

    </tr>
  </thead>


  <tbody>
    <!-- For loop Rows-->
    @foreach($data as $i => $v)


    <!-- To get key-->
    <?php
    foreach ($v as $key => $value) {
      $currKey = $value;
      break;
    }
    ?>
    <tr>

      <!-- For loop To print Rows-->
      @foreach($v as $kay => $val)
      @if($kay == "Message")
      <td style="white-space: break-spaces;">{{$val}}</td>
      @elseif ($kay == "Mobile")
      <td>
        <a style="color: inherit;" href="tel:{{$val}}">
          {{$val}}
          <i style="color:blue" class="fa fa-phone"></i>
        </a>

        @else
      <td>
        @if($kay == 'File')

        @if($val == "N/A")
        N/A
        @else
        <a style="display: block;margin: auto;" class="btn btn-success btn-sm noPrint" download="{{str_replace('files/', '', $val)}}" href="{{asset('/storage/app/public/'.$val)}}"> Download</a></td>
      @endif
      @else
      {{$val}}
      @endif
      @endif

      </td>
      @endforeach


      <!-- To check urls button without add-->
      @if(!empty($urls) && !(count($urls) == 1 && array_key_exists('add', $urls)))
      <td>

        <!-- delete button-->
        @if(isset($urls['eve']))

        <a href="{{$urls['eve']}}/{{ $currKey }}" class="btn btn-primary btn-sm"><i class="fa fa-indent"></i> Add S.Evaluation </a>

        @endif

        <!-- delete button-->
        @if(isset($urls['addpre']))

        <a href="{{$urls['addpre']}}/{{ $currKey }}" class="btn btn-primary btn-sm"><i class="fa fa-indent"></i> Add Pre-requisites </a>

        @endif

        <!-- show button-->
        @if(isset($urls['show']))

        <a href="{{$urls['show']}}/{{ $currKey }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Show </a>

        @endif

        <!-- update button-->
        @if(isset($urls['update']))
        <a href="{{$urls['update']}}/{{ $currKey }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Update </a>

        @endif
        <!-- delete button-->
        @if(isset($urls['delete']))

        <a href="{{$urls['delete']}}/{{ $currKey }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>

        @endif

        <!-- delete button-->
        @if(isset($urls['active']))

        <a href="{{$urls['active']}}/{{ $currKey }}" class="btn btn-success btn-sm"><i class="fa fa-check-circle-o"></i> Activate </a>

        @endif

        <!-- delete button-->
        @if(isset($urls['action']))

        <a href="{{$urls['action']}}/{{ $currKey }}?back={{$urls['back']}}" class="btn btn-success btn-sm"><i class="fa fa-check-circle-o"></i> Action </a>

        @endif

        <!-- delete button-->
        @if(isset($urls['showinstructors']))

        <a href="{{$urls['showinstructors']}}/{{ $currKey }}" class="btn btn-danger btn-sm"><i class="fa fa-users"></i> Show Instructors </a>

        @endif

        <!-- delete button-->
        @if(isset($urls['arc']))

        <a href="{{$urls['arc']}}/{{ $currKey }}" class="btn btn-dark btn-sm"><i class="fa fa-file-archive-o"></i> Archive </a>

        @endif

        <!-- delete button-->
        @if(isset($urls['onhold']))

        <a title="No Answer" href="{{$urls['onhold']}}/{{ $currKey }}" class="btn btn-danger btn-sm"><i class="fa fa-volume-control-phone
"></i></a>

        @endif

        <!-- delete button-->
        @if(isset($urls['track']))
        @isset($comments)

        <span style="position: relative;">
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_{{$i}}" data-backdrop="false">
            Comments
          </button>
          <div style="position: absolute; top: -200px; left: -200px;" class="modal fade" id="modal_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Actions Comments</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @foreach($comments[$i] as $comment)
                  <ul>
                    <li>
                      {{$comment}}
                    </li>
                  </ul>
                  @endforeach
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </span>
        @endisset

        <a title="Call On Actions List" href="{{$urls['track']}}/{{ $currKey }}" class="btn btn-dark btn-sm"><i class="fa fa-info"></i></a>
        @endif

        <!-- delete button-->
        @if(isset($urls['done']))

        <a title="Call" href="{{$urls['done']}}/{{ $currKey }}" class="btn btn-warning btn-sm"><i class="fa fa-phone"></i></a>

        @endif

        <!-- delete button-->
        @if(isset($urls['deal']))

        <a title="New Deal" href="{{$urls['deal']}}/{{ $currKey }}" class="btn btn-success btn-sm"><i class="fa fa-check-circle-o"></i></a>

        @endif








      </td>
      @endif
      @isset($comments)
      @for ($index = 0; $index < count(max($comments)); $index++) <td>
        @if($index < count($comments[$i])) {{$comments[$i][$index]}} @endif </td> @endfor @endisset </tr> @endforeach </tbody> </table> @else <div>No Records Found</div>
          @endif