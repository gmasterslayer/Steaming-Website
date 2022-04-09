Public Class Form1
    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        generate("E:\Movies Website\htdocs\dashboard\movieslistnew.txt")
    End Sub

    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        generate("E:\Movies Website\htdocs\dashboard\tvlistnew.txt")
    End Sub

    Private Sub Button3_Click(sender As Object, e As EventArgs) Handles Button3.Click
        generate("E:\Movies Website\htdocs\dashboard\animelistnew.txt")
    End Sub

    Function generate(name As String)
        Dim whatever As ObjectModel.ReadOnlyCollection(Of String) = My.Computer.FileSystem.GetFiles(TextBox1.Text, FileIO.SearchOption.SearchAllSubDirectories)
        Dim converted As String = ""
        For Each file As String In whatever

            If (file.ToLower.Contains(".mp4") Or file.ToLower.Contains(".mkv") Or file.ToLower.Contains(".avi") Or file.ToLower.Contains(".m4v")) = True Then
                converted += file.Replace("E:\Movies Website\htdocs\dashboard\", "") + vbCrLf
            End If

        Next

        My.Computer.FileSystem.WriteAllText(name, converted, True)
    End Function
End Class
