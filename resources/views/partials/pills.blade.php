<?php

$colors = [ 1 =>'primary', 2 => 'info', 3 =>'warning', 4 => 'success', 5=> 'secondary', 6=> 'danger', 7=> 'light'];

?>

@foreach($project->technologies as $tech)
<?php $random_color = $colors[$tech->id]; ?>
<span class="badge rounded-pill text-bg-{{$random_color}} my-1">{{$tech->name}}</span>
@endforeach