{{--@foreach($categories as $key => $category)--}}
<tr>
    <td class="sort-number">{{ $key+1 }}</td>
    <td class="sort-name">{{ $category->ten }}</td>
    <td class="sort-price">{{ \App\Models\Danhmuc::find($category->danhmuccha)->ten ?? '' }}</td>
    <!-- <td class="sort-created" data-date="{{ strtotime($category->created_at) }}">{{ $category->created_at }}</td>
                                                 <td class="sort-updated" data-date="{{ strtotime($category->updated_at) }}">{{ $category->updated_at }}</td> -->
    @can('Cập nhật dịch vụ')
        <td>
            <button type="button" class="btn btn-ghost-primary">{{ __('Edit') }}</button>
        </td>
    @endcan
    @can('Xóa dịch vụ')
        <td>
            <a href="{{ route('admin.categories.delete',  ['id' => $category->id]) }}" class="btn btn-ghost-danger"
               data-confirm-delete="true">{{ __('Delete') }}</a>
        </td>
    @endcan
</tr>
{{--@endforeach--}}
