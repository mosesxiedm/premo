# dockerdev
Quick setup for playing with PHP

## Running Tests
1. Go inside container
  `docker exec -it premo-fpm ash`

2. cd into working directory
  `cd /site`
  
3. run kahlan
  `./vendor/bin/kahlan --cc=true --reporter=verbose`
