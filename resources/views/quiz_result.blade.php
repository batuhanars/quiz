<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <h3>Puan: {{ $quiz->my_result->point }}</h3>
            <div class="alert alert-warning">
                <i class="fas fa-circle text-secondary"></i> İşaretlediğin Şık <br>
                <i class="fa fa-check text-success"></i> Doğru Cevap <br>
                <i class="fa fa-times text-danger"></i> Yanlış Cevap
            </div>
            @foreach ($quiz->questions as $question)

                @if ($question->correct_answer == $question->my_answer->answer)
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-times text-danger"></i>
                @endif
                <strong>#{{ $loop->iteration }} </strong>
                {{ $question->question }}

                <br>
                <small>Bu soruya <strong>%{{ $question->true_percent }}</strong> oranında doğru cevap verildi.</small>

                @if ($question->image)
                    <img src="{{ asset($question->image) }}" style="width: 50%;" class="mt-2 img-responsive"
                        alt="{{ $question->question }}">
                @endif
                <div class="mt-2">
                    <div class="form-check">
                        @if ('answer1' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer1' == $question->my_answer->answer)
                            <i class="fas fa-circle text-secondary"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ('answer2' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer2' == $question->my_answer->answer)
                            <i class="fas fa-circle text-secondary"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ('answer3' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer3' == $question->my_answer->answer)
                            <i class="fas fa-circle text-secondary"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if ('answer4' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer4' == $question->my_answer->answer)
                            <i class="fas fa-circle text-secondary"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
