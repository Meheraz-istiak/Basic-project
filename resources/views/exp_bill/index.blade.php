<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bill particularls') }}
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
                                    <div class="card-header">Add Bill Form</div>
                                    <div class="card-body">
                                        <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                        <form method="POST" enctype="multipart/form-data" id="department"
                                            @if (isset($data->id)) action="{{ route('bill.update', ['id' => $data->id]) }}">
                                    <input name="_method" type="hidden" value="post">
                                    @else
                                        action="{{ route('bill.store') }}"> @endif
                                            @csrf <div class="row mb-3">
                                            <label for="date" class="col-md-3">Date</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control input-group date"
                                                    name="date" value="{{ isset($data->date) ? $data->date : '' }}"
                                                    placeholder="Enter the amount...">
                                            </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-3">particular</label>
                                        <div class="col-md-9">
                                            <select name="particular_id" class="form-control"
                                                aria-label="Default select example">

                                                <option value="">Select particular</option>

                                                @foreach ($exp_particularl_data as $list)
                                                    <option value="{{ $list->id }}">

                                                        {{ isset($list->id) ? $list->s_name : '' }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="amount" class="col-md-3">Refarence</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control name" name="ref"
                                                value="{{ isset($data->amount) ? $data->amount : '' }}"
                                                placeholder="Enter the Refarence...">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="amount" class="col-md-3">Amount</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control name" name="amount"
                                                value="{{ isset($data->amount) ? $data->amount : '' }}"
                                                placeholder="Enter the amount...">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="p_or_l" class="col-md-3">p_or_l</label>
                                        <div class="col-md-9">
                                            <select id="" class="custom-select" name="p_or_l">
                                                <option value="">--select--</option>
                                                <option value="p">P</option>
                                                <option value="l">L</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row md-3">
                                        <label for="" class="col-md-3"></label>
                                        <div class="col-md-9">

                                            <input type="reset" class="btn btn-sm btn-danger" style="color:black"
                                                value="Reset">
                                            @if (isset($data->id))
                                                <input type="submit" class="btn btn-sm btn-success" style="color:black"
                                                    value="update">
                                            @else
                                                <input type="submit" class="btn btn-sm btn-success" style="color:black"
                                                    value="save">
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
                        <div class="col-md-12 pt-3">
                            <div class="card">
                                <div class="card-header">All Bill Information</div>
                                <div class="card-body">
                                    <p class="text-center text-success"></p>
                                    <table class="table table-success table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>particularl</th>
                                                <th>Refarence</th>

                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>p_or_l</th>

                                                <th>Created By</th>
                                                <th>Updated By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($table_data as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->s_name }}</td>
                                                    <td>{{ $data->ref }}</td>

                                                    <td>{{ $data->amount }}</td>
                                                    <td>{{ $data->date }}</td>
                                                    <td>{{ $data->p_or_l }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td>
                                                        <a href="{{ route('bill.edit', $data->id) }}"
                                                            class="btn btn-sm btn-success">Edit</a>
                                                        <a href="{{ route('bill.delete', $data->id) }}"
                                                            class="btn btn-sm btn-danger">Delete</a>
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
