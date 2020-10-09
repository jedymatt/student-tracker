@extends('layouts.app')

@section('content')
<div class="container">
    <script type="text/javascript">
        function changeList(selectObj) {
            document.getElementById('tbody').innerHTML = '';
            var tableRef = document.getElementById('table').getElementsByTagName('tbody')[0];

            var idx = selectObj.selectedIndex;
            var selectedValue = selectObj.options[idx].value;
            var list = <?php echo json_encode($userList); ?>;
            list.forEach(myFunction);

            function myFunction(item, index) {
                if (item["course_id"] == selectedValue) {
                    // insert tr
                    var row = tableRef.insertRow();

                    // insert elements inside tr
                    var idCell = document.createElement('th');
                    row.appendChild(idCell);
                    var firstnameCell = row.insertCell();
                    var lastnameCell = row.insertCell();
                    var emailCell = row.insertCell();

                    // set contents
                    idCell.innerHTML = item["id"];
                    firstnameCell.innerHTML = item["firstname"];
                    lastnameCell.innerHTML = item["lastname"];
                    emailCell.innerHTML = item["email"];

                    // set attribute
                    idCell.setAttribute("scope", "row");

                    //
                    var dropdownCell = row.insertCell();

                    var button = document.createElement('a');
                    var div = document.createElement('div');
                    dropdownCell.appendChild(button);
                    dropdownCell.appendChild(div);

                    var view = document.createElement('a');
                    var divider = document.createElement('div');
                    var remove = document.createElement('a');
                    div.appendChild(view);
                    div.appendChild(divider);
                    div.appendChild(remove);

                    //set attr
                    button.setAttribute("class", "nav-link dropdown-toggle");
                    button.setAttribute("data-toggle", "dropdown");
                    button.setAttribute("href", "#");
                    button.setAttribute("role", "button");
                    button.setAttribute("aria-haspopup", "true");
                    button.setAttribute("aria-expanded", "false");
                    div.setAttribute("class", "dropdown-menu");
                    view.setAttribute("class", "dropdown-item");
                    view.setAttribute("href", "/viewStudent");
                    view.setAttribute("onclick", `event.preventDefault();
                                                document.getElementById('view-id').setAttribute('value', '` + item['id'] + `');
                                                document.getElementById('view-form').submit();`);
                    divider.setAttribute("class", "dropdown-divider");
                    remove.setAttribute("class", "dropdown-item text-danger");
                    remove.setAttribute("href", "/removeStudent");
                    remove.setAttribute("onclick", `event.preventDefault();
                                                document.getElementById('remove-id').setAttribute('value', '` + item['id'] + `');
                                                document.getElementById('remove-form').submit();`);

                    view.innerHTML = "View Information";
                    remove.innerHTML = "Remove Student";
                }
            }
        }
    </script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Staff') }}</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{session('success')}}</strong>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>

                        <div class="col-md-6">
                            <select id="course_id" class="form-control" name="course_id" onclick="changeList(this);">
                                <option value="1">BSCS</option>
                                <option value="2">BSIT</option>
                                <option value="3">BSECE</option>
                                <option value="4">BSCOE</option>
                                <option value="5">BSEE</option>
                            </select>
                        </div>
                    </div>

                    <table class="table card-body" id="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @foreach($userList as $list)
                            @if($list->course_id == 1)
                            <tr id="student_list">
                                <th scope="row">{{$list->id}}</th>
                                <td>{{$list->firstname}}</td>
                                <td>{{$list->lastname}}</td>
                                <td>{{$list->email}}</td>
                                <td>
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/viewStudent" onclick="event.preventDefault();
                                                document.getElementById('view-id').setAttribute('value', '{{$list->id}}');
                                                document.getElementById('view-form').submit();">View Information</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="/removeStudent" onclick="event.preventDefault();
                                                document.getElementById('remove-id').setAttribute('value', '{{$list->id}}');
                                                document.getElementById('remove-form').submit();">Remove Student</a>
                                        <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                            </div>
                                    </div> -->
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <form id="view-form" action="/viewStudent" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" id="view-id" name="view_id">
                    </form>
                    <form id="remove-form" action="/removeStudent" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" id="remove-id" name="remove_id">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection