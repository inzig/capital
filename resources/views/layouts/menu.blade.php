<li class="{{ Request::is('dashboard') ? 'active' : '' }}">
    <a href="{!! route('dashboard') !!}"><i class="fa fa-home"></i><span>Dashboard</span></a>
</li>

<li class="{{ Request::is('dashboard/buy-tokens*') ? 'active' : '' }}">
    <a href="{!! route('buy-tokens') !!}"><i class="fa fa-opencart"></i><span>Buy Tokens</span></a>
</li>

<li class="{{ Request::is('dashboard/token-calculator*') ? 'active' : '' }}">
    <a href="{!! route('token-calculator') !!}"><i class="fa fa-calculator"></i><span>Token Calculator</span></a>
</li>

<li class="{{ Request::is('dashboard/transactions-history*') ? 'active' : '' }}">
    <a href="{!! route('transactions-history') !!}"><i class="fa fa-history"></i><span>Transactions History</span></a>
</li>

@role('admin')
<li class="header">
    Admin Area
</li>

<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('admin/discounts*') ? 'active' : '' }}">
    <a href="{!! route('discounts.index') !!}"><i class="fa fa-gift"></i><span>Discounts</span></a>
</li>

<li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
    <a href="{!! route('settings.index') !!}"><i class="fa fa-wrench"></i><span>Settings</span></a>
</li>

<li class="treeview {{ Request::is('admin/transactions*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-list"></i>
        <span>Transactions</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="treeview {{ Request::is('admin/transactions') ? 'active' : '' }}">
            <a href="{!! route('transactions.index') !!}"><i class="fa fa-circle-o"></i>Requests</a>
        </li>

        <li class="treeview {{ Request::is('admin/transactions/ethereum') ? 'active' : '' }}">
            <a href="{!! route('transactions.ethereum') !!}"><i class="fa fa-circle-o"></i>Ethereum</a>
        </li>
    </ul>
</li>

@endrole
