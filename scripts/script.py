import os
import re

def rename_files_recursively(directory, old_text, new_text):
    for root, _, files in os.walk(directory):
        for filename in files:
            if old_text in filename:
                new_filename = filename.replace(old_text, new_text)
                old_path = os.path.join(root, filename)
                new_path = os.path.join(root, new_filename)
                os.rename(old_path, new_path)
                print(f"Renamed: {new_filename}")


def replace_text_case_insensitive(directory, old_text, new_text):
    for root, _, files in os.walk(directory):
        for filename in files:
            file_path = os.path.join(root, filename)
            if filename.endswith(".php"):
                with open(file_path, "r") as file:
                    file_contents = file.read()
                new_file_contents = re.sub(re.escape(old_text), new_text, file_contents, flags=re.IGNORECASE)
                with open(file_path, "w") as file:
                    file.write(new_file_contents)
                print(f"Replaced text in: {filename}")

directory = os.path.join(os.path.dirname(__file__), os.pardir)


replace_text_case_insensitive(directory, "My_Plugin", "gen_plug")
rename_files_recursively(directory, 'my-plugin', 'gen-plug')