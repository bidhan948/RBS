@extends('Layouts.main')
@section('title', 'Create Property')
@section('setting_parent', 'mm-active')
@section('is_active_property', 'nav_bar_active')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5>{{ __('Add Property') }}</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('property.index') }}" class="btn btn-primary">Go back</a>
                        </div>
                        <div class="col-12 mt-1">
                            <table class="mb-0 table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-white text-center">
                                        <th colspan="3">
                                            Property Detail
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="font-weight-bold">
                                    <tr>
                                        <td>
                                            <label for="room_type">Room Type <span class="text-danger px-1">*</span></label>
                                            <select name="room_type" id="room_type" class="form-control" required>
                                                <option value="">--SELECT---</option>
                                                <option value="HOTEL">HOTEL</option>
                                                <option value="MOTEL">MOTEL</option>
                                                <option value="RESORT">RESORT</option>
                                                <option value="APARTMENT">APARTMENT</option>
                                                <option value="VILLA">VILLA</option>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <label for="name">Property Name <span
                                                    class="text-danger px-1">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                required>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="font-weight-bold">
                                    <tr class="bg-primary text-white text-center">
                                        <th colspan="3">
                                            Property Address
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="country">Country<span class="text-danger px-1">*</span></label>
                                            <input type="text" value="Nepal" class="form-control" name="country"
                                                id="country" required>
                                        </td>
                                        <td>
                                            <label for="city">City<span class="text-danger px-1">*</span></label>
                                            <input type="text" value="{{ old('city') }}" class="form-control"
                                                name="city" id="city" required>
                                        </td>
                                        <td>
                                            <label for="street_name">Street Name<span class="text-danger px-1">*</span></label>
                                            <input type="text" value="" class="form-control" name="street_name"
                                                id="street_name" required>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script type="text/javascript" src="{{ asset('vue/bundle.js') }}"></script>
    <script>
        new Vue({
            el: "#vue_app",
            data: {},
            methods: {

            },
            mounted() {
                let vm = this;
            }
        });
    </script>
@endsection
@endsection
