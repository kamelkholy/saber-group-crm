@if (count($data) > 0)        
  <table   id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100% !important;">
   
    <thead>
      <tr>
          @foreach($data[0] as $key => $value)

            <th>{{$key}}</th>

          @endforeach
          @if(!empty($urls) && !(count($urls) == 1 && array_key_exists('add', $urls)))
            <th class="noPrint">#Actions</th>
          @endif
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
        @else
         <td>
        @if($kay == 'File')
              
          @if($val == "N/A")
            N/A
          @else
          <a style="display: block;margin: auto;" class="btn btn-success btn-sm noPrint" 
          download = "{{str_replace('files/', '', $val)}}" 
          href="{{asset('/storage/app/public/'.$val)}}"> Download</a></td>
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

         <a href="{{$urls['eve']}}/{{ $currKey }}" class="btn btn-primary btn-sm"><i class="fa fa-indent"></i>  Add S.Evaluation  </a>

       @endif

      <!-- delete button-->
       @if(isset($urls['addpre']))

         <a href="{{$urls['addpre']}}/{{ $currKey }}" class="btn btn-primary btn-sm"><i class="fa fa-indent"></i>  Add Pre-requisites </a>

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

         <a href="{{$urls['action']}}/{{ $currKey }}" class="btn btn-success btn-sm"><i class="fa fa-check-circle-o"></i> Action </a>

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
      </tr>
      @endforeach

                              
      
    </tbody>
  </table>

@else
  <div>No Records Found</div>
@endif