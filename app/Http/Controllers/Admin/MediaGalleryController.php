<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateMediaGalleryRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Storage;

class MediaGalleryController extends AppBaseController
{

    /**
     * Display a listing of the Media.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $directories = Storage::disk('media-gallery')->allDirectories();

        $gallery = [];
        $gallery[''] = Storage::disk('media-gallery')->files();

        foreach ($directories as $directory) {
            $files = Storage::disk('media-gallery')->files($directory);

            if (!empty($files)) {
                $gallery[$directory] = $files;
            }
        }

        return view('admin.media-gallery.index')
            ->with('gallery', $gallery);
    }

    /**
     * Store a newly created SortableContent in storage.
     *
     * @param CreateSortableContentRequest $request
     *
     * @return Response
     */
    public function store(CreateMediaGalleryRequest $request)
    {
        Storage::disk('media-gallery')->putFile($request->get('directory', ''), $request->file('image'));

        Flash::success('Media item saved successfully.');

        return redirect(route('media-gallery.index'));
    }

    /**
     * Remove the specified SortableContent from storage.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $path = $request->get('path', null);

        Storage::disk('media-gallery')->delete($path);

        Flash::success('Media item deleted successfully.');

        return redirect(route('media-gallery.index'));
    }
}
