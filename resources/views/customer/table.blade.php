<table class="table table-striped mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($customers as $item)
          <tr>
            <th scope="row">{{ "SL- " . $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->address }}</td>
          </tr>
        @endforeach
      
    </tbody>
  </table>