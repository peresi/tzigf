@extends('layouts.app')

@section('content')
<header class="site-header">
    <div class="container">
        @include('partials.site-navigation')

        <div class="hero">
            <div>
                <p class="eyebrow">Tanzania Internet Governance Forum</p>
                <h1>Tanzania Multistakeholder Organizing Committee (TzMAG)</h1>
                <p>Committee member listing and stakeholder classification.</p>
            </div>
        </div>
    </div>
</header>

<main>
    <section class="section">
        <div class="container">
            <h2>TzMAG Committee Members</h2>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Stakeholder Name</th>
                            <th>Stakeholder Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Anderson Latson Maulambo<br>RAI Technologies Co. Ltd.</td>
                            <td>Private Sector</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Zaituni Njovu<br>Zaina Foundation</td>
                            <td>Civil Society</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Fatma Haruna Songoro<br>Victory Attorneys</td>
                            <td>Civil Society</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Dr. Nazarius Nicholas<br>Internet Society Tanzania Chapter</td>
                            <td>Tanzania IGF Secretariat</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Leo Magomba<br>Ministry of Communication and Information Technology</td>
                            <td>Government Focal Point 1</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Bahati Zuberi<br>Ministry of Communication and Information Technology</td>
                            <td>Government Focal Point 2</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Millennium Anthony<br>Coordinator Tanzania Youth IGF</td>
                            <td>Youth</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Prof. Cosmas Mnyanyi<br>Open University of Tanzania</td>
                            <td>Academia/Research</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Alex Ngoma<br>PSS</td>
                            <td>Technical</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@include('partials.site-footer')
@endsection
