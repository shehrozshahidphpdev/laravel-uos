@props(['settings'])
<x-user.layouts.master :settings="$settings">
  <x-slot:title>
    Home - Academics
  </x-slot:title>
  <main class="main">
    <x-user.hero-banner :banner="$banner" navigation="Merit List" />
    <section class="academics">
      <div class="container">
        <aside class="navigation">
          <div class="navigation-container">
            <ul class="navigation__list">
              <li class="navigation__item"><a href="{{ route('user.qec') }}" class="go">QEC Office
                  <span class="icon"></span></a></li>
              <li class="navigation__item"><a href={{ route('user.director.academics') }} class="go">QEC Objectives
                  <span class="icon"></span></a></li>
              <li class="navigation__item"><a href="{{ route('user.qec') }}" class="go">QEC Organogram <span
                    class="icon"></span></a></li>
              <li class="navigation__item"><a href="{{ route('user.qecteam') }}" class="go">QEC Team <span
                    class="icon"></span></a></li>
            </ul>
          </div>
        </aside>
        <div class="content">
          <h1 class="secondary-title">
            {{ $tableTitle->title }}
          </h1>
          <div class="table-container">
            <table class="table">
              <thead class="table-head">
                <tr>
                  @foreach($tableColumns->columns as $column)
                    <th><b>{{ $column }}</b></th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach ($tableRows as $data)
                  <tr class="odd">
                    @foreach ($data->rows as $row)
                      <td>
                        {{ $row }}
                      </td>
                    @endforeach
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </section>
  </main>
</x-user.layouts.master>