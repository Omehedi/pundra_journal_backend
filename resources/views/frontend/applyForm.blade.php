@extends('frontend.layouts.master')
@section('content')
    <div class="section section-padding">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    <div class="text-success text-center">
                        <p> {{ session('success') }}</p>
                    </div>
                </div>

                @elseif (session('warning'))
                <div class="alert alert-warning">
                    <div class="">
                        <p> {{ session('warning') }}</p>
                    </div>
                </div>
            @endif
            <div class="row">
                <form method="post" action="{{url('/apply_applicant')}}" enctype="multipart/form-data">
                    @csrf
                    <h5>Personal Information</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-form-label" for="name">Applicant Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="job_id" value="{{$id}}">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="date_of_birth">Date Of Birth <strong id="dob_difference"></strong></label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="f_name">Father's Name</label>
                            <input type="text" class="form-control" id="f_name" name="f_name" value="{{ old('f_name') }}">
                            @error('f_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="m_name">Mother's Name</label>
                            <input type="text" class="form-control" id="m_name" name="m_name" value="{{ old('m_name') }}">
                            @error('m_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="nid">National ID</label>
                            <input type="number" class="form-control" id="nid" name="nid" value="{{ old('nid') }}">
                            @error('nid')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="passport">Passport (if yes)</label>
                            <input type="text" class="form-control" id="passport" name="passport" value="{{ old('passport') }}">
                            @error('passport')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Select</option>
                                <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Male</option>
                                <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="district_id">Districts</label>
                            <select class="form-control" id="district_id" name="district_id">
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option {{ old('district_id') == $district->id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="edu_id">Education</label>
                            <select class="form-control" id="edu_id" name="edu_id">
                                <option value="">Select Education Label</option>
                                @foreach($education as $edu)
                                    <option {{ old('edu_id') == $edu->EDU_QUA_CODE ? 'selected' : '' }} value="{{ $edu->EDU_QUA_CODE }}">{{ $edu->EDU_QUA_DESC }}</option>
                                @endforeach
                            </select>
                            @error('edu_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="subject_id">Subject</label>
                            <select class="form-control" id="subject_id" name="subject_id">
                                <option value="">Select Subject</option>
                                @foreach($subject as $subj)
                                    <option {{ old('subject_id') == $subj->SUBJECT_CODE ? 'selected' : '' }} value="{{ $subj->SUBJECT_CODE }}">{{ $subj->SUBJECT_NAME }}</option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="reference">Expected Salary</label>
                            <input type="text" class="form-control" id="aspect_salary" name="aspect_salary" value="{{ old('aspect_salary') }}">
                            @error('aspect_salary')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label" for="reference">Reference</label>
                            <textarea type="text" rows="2" class="form-control" id="reference" name="reference">
                                {{ old('reference') }}
                            </textarea>
                            @error('reference')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label" for="present_address">Present Address</label>
                            <textarea type="text" class="form-control" id="present_address" name="present_address">
                                {{ old('present_address') }}
                            </textarea>
                            @error('present_address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label" for="permanent_address">Permanent Address</label>
                            <textarea type="text" class="form-control" id="permanent_address" name="permanent_address">
                                {{ old('permanent_address') }}
                            </textarea>
                            @error('permanent_address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label" for="cv_file">Upload CV</label>
                            <input type="file" class="form-control" id="cv_file" name="cv_file">
                            @error('cv_file')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label" for="image">Upload Photo</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('date_of_birth').addEventListener('change', function() {
            const dob = new Date(this.value);
            const today = new Date();

            let years = today.getFullYear() - dob.getFullYear();
            let months = today.getMonth() - dob.getMonth();
            let days = today.getDate() - dob.getDate();

            if (months < 0 || (months === 0 && days < 0)) {
                years--;
                months += 12;
            }
            if (days < 0) {
                months--;
                const previousMonth = new Date(today.getFullYear(), today.getMonth() - 1, 0);
                days += previousMonth.getDate();
            }

            document.getElementById('dob_difference').textContent = `${years} years, ${months} months, ${days} days`;
        });
    </script>
@endsection
