<?php

namespace App\Http\Controllers\Admin;

trait FileUpload {
    private function uploadFiles($files, &$data, &$translations)
    {
        if (!empty($files)) {
            if(isset($files['image'])) {
                $name = str_random().'.'.$files['image']->getClientOriginalExtension();
                $destinationPath = public_path('/files/image');
                $files['image']->move($destinationPath, $name);

                $data['image'] = 'files/image/'.$name;
            }

            if(isset($files['translations'])) {
                foreach ($files['translations'] as $locale => $file) {
                    foreach ($file as $field => $upload) {
                        if(is_array($upload)) {
                            foreach ($upload as $subField => $subUpload) {
                                $name = str_random().'.'.$subUpload->getClientOriginalExtension();
                                $destinationPath = public_path('/files/'.$subField);
                                $subUpload->move($destinationPath, $name);

                                $translations['translations'][$locale][$field][$subField] = 'files/'.$subField.'/'.$name;
                            }
                        } else {
                            $name = str_random().'.'.$upload->getClientOriginalExtension();
                            $destinationPath = public_path('/files/'.$field);
                            $upload->move($destinationPath, $name);

                            $translations['translations'][$locale][$field] = 'files/'.$field.'/'.$name;
                        }
                    }
                }
            }

            if(isset($files['base_extra'])) {
                foreach ($files['base_extra'] as $field => $upload) {
                    $name = str_random().'.'.$upload->getClientOriginalExtension();
                    $destinationPath = public_path('/files/'.$field);
                    $upload->move($destinationPath, $name);

                    $data['base_extra'][$field] = 'files/'.$field.'/'.$name;
                }
            }
        }
    }
}