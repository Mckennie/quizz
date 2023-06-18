<x-app-layout>
    <x-slot name="header">{{$quiz->title}} create new question for</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('questions.store',$quiz->id)}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Question</label>
                    <textarea name="question" class="form-control" rows="4">{{ old('question') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">   
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Reply</label>
                            <textarea name="answer1" class="form-control" rows="2">{{ old('answer1') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Reply</label>
                            <textarea name="answer2" class="form-control" rows="2">{{ old('answer2') }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Reply</label>
                            <textarea name="answer3" class="form-control" rows="2">{{ old('answer3') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. Reply</label>
                            <textarea name="answer4" class="form-control" rows="2">{{ old('answer4') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Correct answer</label>
                    <select name="correct_answer" class="form-control">
                        <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">1. Reply</option>
                        <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2. Reply</option>
                        <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3. Reply</option>
                        <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4. Reply</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Create Question</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>