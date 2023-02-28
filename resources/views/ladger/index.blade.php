<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expense particularls') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">All Bill Information</div>
              <div class="card-body">
                <p class="text-center text-success"></p>

                <form action="{{route('search.index')}}" method="post" class="pt-3 pb-3">
                    @csrf

                    <select  class="form-control" name="exp_particularl" id="exp_particularl" >
                        <option value=""> --seleted name</option>
                        @if(!empty($exp_particularls))
                          @foreach($exp_particularls as $exp_particularl)
                          <option value="{{$exp_particularl->id}}">{{$exp_particularl->s_name}}</option>
                          @endforeach
                         @endif

                    </select>
                    <input type="date" class="form-control" name="formdate">
                    <input type="date" class="form-control" name="todate">


                    <button type="submit" class="btn btn-info">search</button>

                </form>

                 <table class="table table-success table-bordered table-hover myTable">
                  <thead>
                    <tr>
                      <th>Sl No</th>
                      <th>supplier</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <th>p_or_l</th>

                      <th>Created By</th>
                      <th>Updated By</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($table_data as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->s_name }}</td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->p_or_l }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->name }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
{{-- <script>
    jQuery(document).ready(function(){
       jQuery(".save").click(function(){
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        var name =jquery(".name").val();
        $.ajax({
            url:"/particularl-store",
            type:"POST",
            data:{
                'name':name,
            },
            success:function(response){
                alert(response.status)

            }
        })
       })
    });

</script> --}}

