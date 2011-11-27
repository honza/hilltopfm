import os
from jinja2 import Environment, FileSystemLoader


class Jinja2Renderer(object):

    def __init__(self, path):
        self.env = Environment(loader=FileSystemLoader(path))

    def render(self, template, values):
        t = self.env.get_template(template)
        return t.render(values)


class Builder(object):

    def __init__(self):
        self.pages = os.listdir('pages')
        self.renderer = Jinja2Renderer('pages')

    def process_page(self, filename):
        if filename.startswith('_'):
            return
        html = self.renderer.render(filename, {})
        self.save_file(filename, html)

    def save_file(self, filename, html):
        f = open('build/%s' % filename, 'w')
        f.write(html)
        f.close()

    def run(self):
        for page in self.pages:
            self.process_page(page)


def main():
    b = Builder()
    b.run()


if __name__ == '__main__':
    main()
