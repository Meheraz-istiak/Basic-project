<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expense particularls') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-md-8">
                            <div class="card">
                              <div class="card-header">Add Expense Form</div>
                              <div class="card-body">
                                <p class="text-center text-success">{{ Session::get('msg')}}</p>
                                <form method="POST" enctype="multipart/form-data" id="department"

                                    @if(isset($data1->id))
                                      action="{{ route('particularl.update', ['id' => $data1->id]) }}">
                                    <input name="_method" type="hidden" value="post">
                                    @else
                                        action="{{ route('particularl.store')}}">
                                    @endif
                                    @csrf
                                  <div class="row mb-3">
                                    <label for="name" class="col-md-3">Name</label>
                                    <div class="col-md-9">
                                      <input type="text"
                                        class="form-control name"
                                        name="s_name"
                                        value="{{isset($data1->name) ? $data1->name:''}}"
                                        placeholder="Enter the Name...">
                                    </div>
                                  </div>

                                  <div class="row md-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">

                                      <input type="reset" class="btn btn-sm btn-danger" style="color:black" value="Reset">
                                      @if(isset($data1->id))
                                      <input type="submit" class="btn btn-sm btn-success" style="color:black" value="update">
                                      @else
                                      <input type="submit" class="btn btn-sm btn-success" style="color:black" value="save">
                                      @endif
                                    </div>
                                  </div>

                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-md-8">
                            <div class="card">
                              <div class="card-header">All Expense Information</div>
                              <div class="card-body">
                                <p class="text-center text-success"></p>
                                <table class="table table-success table-bordered table-hover">
                                  <thead>
                                    <tr>
                                      <th>Sl No</th>
                                      <th>Name</th>
                                      <th>Created By</th>
                                      <th>Updated By</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data as $cat)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cat->s_name }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>
                                          <a href="{{route('particularl.edit',$cat->id)}}" class="btn btn-sm btn-success">Edit</a>
                                          <a href="{{route('particularl.delete',$cat->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
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

