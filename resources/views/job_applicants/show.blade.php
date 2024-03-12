<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>{{ __('Title') }}</td>
                        <td>{{ $jobBoard->title }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Position') }}</td>
                        <td>{{ $jobBoard->position }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Name') }}</td>
                        <td>{{ $jobApplicant->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Email') }}</td>
                        <td>{{ $jobApplicant->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Message') }}</td>
                        <td>{{ $jobApplicant->message }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('CV') }}</td>
                        <td><a download href="{{ asset(Storage::url('uploads/job_applicant/' . $jobApplicant->cv)) }}">{{$jobApplicant->cv}}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        
    </div>
</div>
