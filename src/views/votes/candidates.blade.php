<h3>Candidatos</h3>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Votos (Total)</th>
    </tr>
  </thead>
  <tbody>
    @forelse( $candidatesVotes as $canVotes)
    <tr>
      <td>{{ $canVotes['name'] }}</td>
      <td>{{ $canVotes['votes'] }}</td>
 
    </tr>
    @empty
    @endforelse
    
  </tbody>
</table>