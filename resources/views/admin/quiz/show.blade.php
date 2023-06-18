<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <h5 class="card-title">
                    <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Back to Quizzes</a>
                </h5>
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                                                            
                            @if ($quiz->finished_at)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Deadline to Join
                                    <span title="{{$quiz->finished_at}}" class="badge badge-secondary badge-pill">{{ $quiz->finished_at->diffForHumans().' its ending.' }}</span>
                                </li>
                            @endif

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of questions                                <span class="badge badge-warning badge-pill">{{ $quiz->questions_count }}</span>
                            </li>

                            @if ($quiz->details)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                The number of participants
                                    <span class="badge badge-secondary badge-pill">{{ $quiz->details['join_count'] }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                Average Score
                                    <span class="badge badge-light badge-pill">{{ $quiz->details['average'] }}</span>
                                </li>
                            @endif
                            
                        </ul>
                        
                        @if(count($quiz->topTen)>0)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="card-title">Top 10</div>
                                    <ul class="list-group">
                                        @foreach ($quiz->topTen as $result)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="h6">{{ $loop->iteration."." }}</strong>
                                                <img src="{{ $result->user->profile_photo_url }}" class="w-8 rounded-full" alt="{{ $result->user->name }}">
                                                <span @if(auth()->user()->id == $result->user_id) class="text-success" @endif>{{ $result->user->name }}</span>
                                                <span class="badge badge-info badge-pill">{{ $result->point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-8">
                         {{ $quiz->description }}</p>

                         <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Name surname</th>
                                <th scope="col">Point</th>
                                <th scope="col">TRUE</th>
                                <th scope="col">False</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz->results as $result)
                                <tr>
                                    <td>{{ $result->user->name }}</td>
                                    <td>{{ $result->point }}</td>
                                    <td>{{ $result->correct }}</td>
                                    <td>{{ $result->wrong }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>

                    </div>
                </div>
               
        </div>
    </div>
</x-app-layout>
