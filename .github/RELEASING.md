# Releasing DataLayer for GTM and Matomo

Releases are published to WordPress.org by GitHub Actions. No local SVN checkout is needed.

## Steps

1. **Bump the version** (same number everywhere):
   - `datalayer.php`: `Version:` header and `OMDL_VERSION`
   - `readme.txt`: `Stable tag:`
2. **Update `readme.txt`**: add the `= X.Y.Z =` entry at the top of `== Changelog ==` with the release date, update `Tested up to:` if needed. Mirror user-facing changes in `README.md` (GitHub page).
3. **Commit and push** to `main`.
4. **Tag and push**: `git tag -a X.Y.Z -m "DataLayer for GTM and Matomo X.Y.Z" && git push origin X.Y.Z`, or create a GitHub release with a new tag `X.Y.Z` (no `v` prefix).

The tag triggers `.github/workflows/deploy-wordpress-org.yml`, follow it in the Actions tab.

## What the workflow does

- Fails before touching SVN when the tag differs from the header `Version` or the readme `Stable tag`.
- Copies the repository to SVN `trunk/` (minus `.distignore`), then creates `tags/X.Y.Z`. An existing tag is never overwritten.
- Leaves SVN `assets/` (banners, icons) untouched: they are managed directly in SVN. The repository `assets/` folder is the plugin's own JavaScript and ships with the plugin.
- Uses the repository secrets `SVN_USERNAME` (`openmost`) and `SVN_PASSWORD` (the SVN password generated on WordPress.org, Edit Profile, Account & Security, SVN credentials, not the login password).

## What ships

Everything tracked by git except the `.distignore` entries (`.github/`, `.claude/`, dot files).

## Readme-only changes

A change to `readme.txt` alone (for example `Tested up to`) only appears on WordPress.org with a new version, or by copying the file by hand into SVN `trunk/` and `tags/<stable>/`. The simplest path is a patch release (X.Y.Z+1).
