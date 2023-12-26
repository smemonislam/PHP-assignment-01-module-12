@extends('backend.layouts.app')
@section('title','IMS | Add Ticket')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ticket -> Ticket List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ticket</a></li>
                                <li class="breadcrumb-item active">Ticket List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="{{ route('tickets.index') }}" class="btn btn-success"
                                            id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Back</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success" id="success-message">{{ session('success') }}</div>
                                <script>
                                    setTimeout(function() {
                                        var successMessage = document.getElementById('success-message');
                                        if (successMessage) {
                                            successMessage.style.display = 'none';
                                        }
                                    }, 5000);
                                </script>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('tickets.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Bus
                                                <span class="text-danger">
                                                    *
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <select class="form-select" name="trip_id" id="tripId">
                                                    <option disabled>Choose Loactions...</option>
                                                    @foreach($trips as $trip)
                                                        <option value="{{ $trip->bus->id }}">{{ $trip->bus->bus_name }}</option>
                                                    @endforeach
                                                </select>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Trip Location
                                                <span class="text-danger">
                                                    *
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <select class="form-select" name="trip_id" id="tripId">
                                                    <option disabled>Choose Loactions...</option>
                                                    @foreach($trips as $trip)
                                                        <option value="{{ $trip->road->id }}">{{ $trip->road->origin }}-{{ $trip->road->destination }}</option>
                                                    @endforeach
                                                </select>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Trip Date
                                                <span class="text-danger">
                                                    *
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <select class="form-select" name="trip_id" id="tripId">
                                                    <option disabled>Choose Date...</option>
                                                    @foreach($trips as $trip)
                                                        <option value="{{ $trip->id }}">{{ $trip->date }}</option>
                                                    @endforeach
                                                </select>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                Seat Number
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <select class="form-select" name="seat_number">
                                                    <option disabled>Choose Seat ...</option>
                                                    @for ($i = 1; $i <= 36; $i++)    
                                                        @if( ! in_array($i, $tickets))                                                    
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endif
                                                    @endfor                                                     
                                                </select>
                                            </div>
                                        </div>
                                    </div>     
                                    
                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                User Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                User Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="mb-lg-0">
                                            <label for="" class="form-label">
                                                User Phone
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->   

    <!-- Add Color Pop-up End  -->
    @include('backend.layouts.footer')

</div>
<!-- end main content-->

@endsection
