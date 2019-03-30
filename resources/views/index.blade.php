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
    <div>
        <h3 class="text-center">Your weights are here</h3>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Weight(in Kg)</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>56</td>
                        <td>26/16/2019</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layouts.footer') 