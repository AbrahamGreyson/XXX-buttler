<nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
  <ul class="nav bs-docs-sidenav">
    <li class="active"><a href="#">Generator</a>
      <ul class="nav elektra-sidebar">
        <li @if(is_active_menu('generator', 'auth')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'auth']) }}">Auth</a>
        </li>
        <li @if(is_active_menu('generator', 'console')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'console']) }}">Console</a>
        </li>
        <li @if(is_active_menu('generator', 'controller')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'controller']) }}">Controller</a>
        </li>
        <li @if(is_active_menu('generator', 'crud')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'crud']) }}">CRUD</a>
        </li>
        <li @if(is_active_menu('generator', 'event')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'event']) }}">Event</a>
        </li>
        <li @if(is_active_menu('generator', 'job')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'job']) }}">Job</a>
        </li>
        <li @if(is_active_menu('generator', 'listener')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'listener']) }}">Listener</a>
        </li>
        <li @if(is_active_menu('generator', 'middleware')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'middleware']) }}">Middleware</a>
        </li>
        <li @if(is_active_menu('generator', 'migration')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'migration']) }}">Migration</a>
        </li>
        <li @if(is_active_menu('generator', 'model')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'model']) }}">Model</a>
        </li>
        <li @if(is_active_menu('generator', 'policy')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'policy']) }}">Policy</a>
        </li>
        <li @if(is_active_menu('generator', 'provider')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'provider']) }}">Provider</a>
        </li>
        <li @if(is_active_menu('generator', 'request')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'request']) }}">Request</a>
        </li>
        <li @if(is_active_menu('generator', 'seeder')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'seeder']) }}">Seeder</a>
        </li>
        <li @if(is_active_menu('generator', 'test')) class="active" @endif >
          <a href="{{ route('elektra.generator.{generator}', ['generator' => 'test']) }}">Test</a>
        </li>
      </ul>
    </li>
    <li class="">
      <a href="#whats-included">Migration</a>
      <ul class="nav">
        <li><a href="#whats-included-precompiled">Precompiled</a></li>
        <li><a href="#whats-included-source">Source code</a></li>
      </ul>
    </li>
    <li>
      <a href="#grunt">Others</a>
      <ul class="nav">
        <li><a href="#grunt-installing">Installing Grunt</a></li>
        <li><a href="#grunt-commands">Available Grunt commands</a></li>
        <li><a href="#grunt-troubleshooting">Troubleshooting</a></li>
      </ul>
    </li>
    <li><a href="#">Log</a></li>
    <li>
      <a href="#examples">Languages</a>
      <ul class="nav">
        <li><a href="#examples-framework">Using the framework</a></li>
        <li><a href="#examples-navbars">Navbars in action</a></li>
        <li><a href="#examples-custom">Custom components</a></li>
        <li><a href="#examples-experiments">Experiments</a></li>
      </ul>
    </li>
  </ul>
  <a class="back-to-top" href="#top"> Back to top </a>
</nav>
