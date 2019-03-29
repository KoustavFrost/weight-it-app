@include('layouts.header')
<div class="container" style="margin-top: 60px;">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Enter your weight here</h1>
            <div class="text-center">
                <form method="post" action="/insertWeights">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter email">
                    </div>
                    <input type="submit" value="Go!" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer') 