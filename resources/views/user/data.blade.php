<tr>
                   <td>{{ $data->name }}</td>
                   <td>{{ $data->status }}</td>
                   <td>{{ $data->show }}</td>
                   <td>{{ $data->content }}</td>
                     
                    <td>{{ $data->my_soft_delete }}</td>
                   <td>{{ $data->created_at }}</td>
                   <td>{{ $data->deleted_at }}</td>
                   <td>{{ $data->updated_at }}</td>
                   <td>
                         <a href="user/{{ $data-> id }}/edit">Edit</a>
                         <a href="user/{{ $data-> id   }}">Show</a>
                         <form method="post" action="{{ route('user.destroy',['user'=> $data->id ]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete"/>
                         </from>
                         <form method="post" action="{{ route('user.forceDelete',['user'=> $data->id ]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="forceDelete"/>
                         </from>
                         <form method="post" action="{{ route('user.restore',['user'=> $data->id ]) }}">
                            @csrf
                           
                            <input type="submit" value="restore"/>
                         </from>
                         
                   </td>
            </tr>