## Test task for AWNETWORK

@uses [Laravel 5.0.33](//laravel.com/docs)
@uses [Bootstrap 3.3.5](//getbootstrap.com)

## Task description

Create a simple video uploading portal, handling categories, videos and owners. There is no need for administration, but use Bootstrap for displaying content.
There is no need to convert the uploaded videos, but having preview images for videos are a must.

## Application wireframe

- All videos
    * Category list (on left)
    * Video thumbnails (on right)
- Category videos
    * Category list, with marked active category (on left)
    * Video thumbnails (on right)
- Video page
    * HTML5 video player and category, owner information
- Upload page
    * File upload form

## Assumptions and basics for demonstration purpose

- Video uploading requires no authentication, the user can select video owner from a dropdown list. Authentication itself could be easily implemented with Laravel's auth scaffolding.
- There are a few categories, that can also be selected from a dropdown. These are not managable, they are to be seeded into the database.
- Video preview image is created with ffmpeg at a random moment between the 5th second and end of the video. On shorter videos, default is half the playtime.
    * A nice-to-have feature would be to automatically filter out black content.
- Application is ran on Google Chrome (45.0.2454.85 m 64-bit).

## Development, testing and documentation

- WAMP environment with ffmpeg installed and added to path
- Documentation using phpDoc syntax

### Bugs, missing features
- Upload does not show a success message, simply redirects to the site root, if validation succeeds
- File size is not checked on upload
