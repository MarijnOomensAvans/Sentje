@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Settings</div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-sm-4 col-lg-3 col-form-label">Language</label>
                            <div class="col-sm-8 col-lg-9">
                                <select class="form-control " name="language">
                                    <option value="en">Engels</option>
                                    <option value="nl" selected="">Nederlands</option>
                                    <option value="browser">Browser</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12 text-left">
                                <a href="{{ route('home') }}" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
