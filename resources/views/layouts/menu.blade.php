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
<li class="treeview {{ (Request::is('admin*') && !(Request::is('admin/users*') || Request::is('admin/settings*') || Request::is('admin/transactions*') || Request::is('admin/discounts*'))) ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-code"></i>
        <span>Content</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/seo*') ? 'active' : '' }}">
            <a href="{!! route('seo.index') !!}"><i class="fa fa-circle-o-notch"></i>SEO</a>
        </li>

        <li class="{{ Request::is('admin/navbar*') ? 'active' : '' }}">
            <a href="{!! route('navbar.index') !!}"><i class="fa fa-circle-o-notch"></i>Navbar</a>
        </li>

        <li class="treeview {{ Request::is('admin/home*') || Request::is('admin/pre-sale-timer*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-circle-o-notch"></i>
                <span>Home</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview {{ Request::is('admin/home*') && Request::get('stage') == 'private-sale' ? 'active' : '' }}">
                    <a href="{!! route('home.index', ['stage' => 'private-sale']) !!}"><i class="fa fa-circle-o"></i>Private Sale</a>
                </li>
                <li class="treeview {{ Request::is('admin/home*') && Request::get('stage') == 'pre-sale' ? 'active' : '' }}">
                    <a href="{!! route('home.index', ['stage' => 'pre-sale']) !!}"><i class="fa fa-circle-o"></i>Pre Sale</a>
                </li>
                <li class="treeview {{ Request::is('admin/home*') && Request::get('stage') == 'main-sale' ? 'active' : '' }}">
                    <a href="{!! route('home.index', ['stage' => 'main-sale']) !!}"><i class="fa fa-circle-o"></i>Main Sale</a>
                </li>
                <li class="{{ Request::is('admin/pre-sale-timer*') ? 'active' : '' }}">
                    <a href="{!! route('pre-sale-timer.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Pre-Sale Timer</span></a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/partners*') ? 'active' : '' }}">
            <a href="{!! route('partners.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Partners</span></a>
        </li>

        <li class="{{ Request::is('admin/about*') ? 'active' : '' }}">
            <a href="{!! route('about.index') !!}"><i class="fa fa-circle-o-notch"></i>About Us</a>
        </li>

        <li class="{{ Request::is('admin/problem-statement*') ? 'active' : '' }}">
            <a href="{!! route('problem-statement.index') !!}"><i class="fa fa-circle-o-notch"></i>Problem Statement</a>
        </li>

        <li class="{{ Request::is('admin/solution*') ? 'active' : '' }}">
            <a href="{!! route('solution.index') !!}"><i class="fa fa-circle-o-notch"></i>Solution</a>
        </li>

        <li class="{{ Request::is('admin/newsletter*') ? 'active' : '' }}">
            <a href="{!! route('newsletter.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Newsletter</span></a>
        </li>

        <li class="{{ Request::is('admin/roadmap*') ? 'active' : '' }}">
            <a href="{!! route('roadmap.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Roadmap</span></a>
        </li>

        <li class="{{ Request::is('admin/features*') ? 'active' : '' }}">
            <a href="{!! route('features.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Features</span></a>
        </li>

        <li class="{{ Request::is('admin/token-sale*') ? 'active' : '' }}">
            <a href="{!! route('token-sale.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Token Sale</span></a>
        </li>

        <li class="{{ Request::is('admin/team*') ? 'active' : '' }}">
            <a href="{!! route('team.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Team</span></a>
        </li>

        <li class="{{ Request::is('admin/advisers*') ? 'active' : '' }}">
            <a href="{!! route('advisers.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Advisers</span></a>
        </li>

        <li class="{{ Request::is('admin/news') || Request::is('admin/news/*') ? 'active' : '' }}">
            <a href="{!! route('news.index') !!}"><i class="fa fa-circle-o-notch"></i><span>News</span></a>
        </li>

        <li class="treeview {{ Request::is('admin/posts*') || Request::is('admin/categories*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-circle-o-notch"></i>
                <span>Blog</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="treeview {{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <a href="{!! route('categories.index') !!}"><i class="fa fa-circle-o"></i>Categories</a>
                </li>
                <li class="treeview {{ Request::is('admin/posts*') ? 'active' : '' }}">
                    <a href="{!! route('posts.index') !!}"><i class="fa fa-circle-o"></i>Posts</a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/faq*') ? 'active' : '' }}">
            <a href="{!! route('faq.index') !!}"><i class="fa fa-circle-o-notch"></i><span>FAQs</span></a>
        </li>

        <li class="{{ Request::is('admin/follow-us*') ? 'active' : '' }}">
            <a href="{!! route('follow-us.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Follow Us</span></a>
        </li>

        <li class="{{ Request::is('admin/social-networks*') ? 'active' : '' }}">
            <a href="{!! route('social-networks.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Social Networks</span></a>
        </li>

        <li class="{{ Request::is('admin/terms-and-conditions*') ? 'active' : '' }}">
            <a href="{!! route('terms-and-conditions.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Terms & Conditions</span></a>
        </li>

        <li class="{{ Request::is('admin/privacy-policy*') ? 'active' : '' }}">
            <a href="{!! route('privacy-policy.index') !!}"><i class="fa fa-circle-o-notch"></i><span>Privacy Policy</span></a>
        </li>

        <li class="{{ Request::is('admin/media-gallery*') ? 'active' : '' }}">
            <a href="{!! route('media-gallery.index') !!}"><i class="fa fa-file-image-o"></i>Media Gallery</a>
        </li>
    </ul>
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
