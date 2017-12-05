<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('home')}}"><i class="icon-speedometer"></i> Dashboard</a>
            </li>
            <li class="nav-title">
                Data Mining
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Master</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('author.index')}}"><i class="icon-puzzle"></i> Author</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('publisher.index') }}"><i class="icon-puzzle"></i> Publisher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gmd.index') }}"><i class="icon-puzzle"></i> GMD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subject.index') }}"><i class="icon-puzzle"></i> Subject</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('location.index') }}"><i class="icon-puzzle"></i> Location</a>
                    </li>
                    
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Transaction</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('books')}}"><i class="icon-puzzle"></i> Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('loans')}}"><i class="icon-puzzle"></i> Loan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('simulasi')}}"><i class="icon-puzzle"></i> Member</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Report</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('rule')}}"><i class="icon-puzzle"></i> Loan Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('frequent')}}"><i class="icon-puzzle"></i> Member Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('simulasi')}}"><i class="icon-puzzle"></i> Collection Report</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>