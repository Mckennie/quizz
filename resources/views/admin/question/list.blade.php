<x-app-layout>
    <x-slot name="header">{{$quiz->title}} Quiz Questions</x-slot>
    <div class="card">
        <div class="card-body">
            
            <h5 class="card-title float-right">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Create Question</a>
            </h5>
            <h5 class="card-title">
                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> Back to Quizzes</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Question</th>
                        <th scope="col">Image</th>
                        <th scope="col">1. Reply</th>
                        <th scope="col">2. Reply</th>
                        <th scope="col">3. Reply</th>
                        <th scope="col">4. Reply</th>
                        <th scope="col">Correct answer</th>
                        <th scope="col">Transactions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td>
                            @if ($question->image)
                                <a href="{{asset($question->image)}}" class="btn btn-sm btn-light" target="_blank">view</a>
                            @endif
                        </td>
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td>{{substr($question->correct_answer, -1)}}. Reply</td>
                        <td style="width:100px ">
                            <a href="{{route('questions.edit',[$quiz->id, $question->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                            <a href="{{route('questions.destroy',[$quiz->id, $question->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
