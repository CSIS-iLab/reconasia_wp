chmod 600 /tmp/reconasia_rsa
eval "$(ssh-agent -s)" # Start the ssh agent
ssh-add /tmp/reconasia_rsa
git remote add reconasia-development git@git.wpengine.com:production/reconasiadev.git # add remote for development site
git fetch --unshallow # fetch all repo history or wpengine complain
git status # check git status
git checkout development # switch to development branch
git add wp-content/themes/reconasia/*.css -f # force all compiled CSS files to be added
git add wp-content/themes/reconasia/assets -f # force all compiled JS & optimized images
git add wp-content/plugins/reconasia-blocks/dist -f # force all compiled JS for blocks
git commit -m "Compiled & bundled all assets" # commit the compiled CSS files
git push -f reconasia-development development #deploy to development site from development